<?php
namespace App\Traits;

trait HasSecretStore 
{

    /**
     * Get the Lines for the SalesOrder.
     */
    public function secrets()
    {
        return $this->morphMany(SecretStore::class, 'storable');
    }

    public function saveSecrets($request)
    {
      
        //Save new / existing values
        if ($request->has('secret')) {
            //Remove any existing values
            $attributes = $request->get('secret');

            $ids = collect($attributes)->pluck('id');
            $this->secrets()->whereNotIn('id', $ids)->delete();

            $counter = 100;
            
            foreach ($attributes as $att) {
                $counter++;
                if (!empty($att['name']) && !empty($att['value'])) {
                    $attribute = isset($att['id']) ? SecretStore::find($att['id']) : new SecretStore();
                    $attribute->fill($att);
                    if (empty($attribute->position)) {
                        $attribute->position = $counter;
                    }
                    $this->secrets()->save($attribute);
                }
            }
        } else {
            $this->secrets()->delete();
        }
    }
}
