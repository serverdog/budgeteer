<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $article->title }}</p>
</div>

<!-- Publisher Field -->
<div class="form-group">
    {!! Form::label('publisher', 'Publisher:') !!}
    <p>{{ $article->publisher }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $article->url }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{{ $article->country_id }}</p>
</div>

