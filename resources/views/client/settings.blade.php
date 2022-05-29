@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar')
@endsection

@section('content')
  <div class='container'>

    @if (isset($greeting))
      <div class='alert alert-primary' role='alert'>{{ $greeting }}</div>
    @elseif(isset($failing))
      <div class='alert alert-danger' role='alert'>{{ $failing }}</div>
    @endif

    <h1>Setting</h1>

    {{ Form::open(['url' => route('settings.save')]) }}
      @foreach ($mailCategories as $mailCategory )

        {{ Form::hidden($mailCategory->name, 0) }}
        {{ Form::checkbox($mailCategory->name, '1', old($mailCategory->name, $user->isReceivedMailByMailCategoryId($mailCategory->id) ), ['id' =>$mailCategory->name,'class' => 'form-check-input']) }}
        {{ Form::label($mailCategory->name,  $mailCategory->annotation) }} <br>

        @endforeach

        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}

    {{ Form::close() }}
  </div>
@endsection
