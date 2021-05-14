@extends('master')

@section('title', 'My Messages')

@section('content')
<div class="col-s12">
  <br />
  <h3>Leave me a message!</h3>
  <form action="/create" method="post">
    {{ csrf_field() }}

    <div class="row col-4">
      <div class="mb-3">
        <label for="title" class="form-label">Title
          @if($errors->has('title'))
            <span style="color: red"> *Required*</span>
          @endif
        </label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Message ( 150 char max )
          @if($errors->has('content'))
            <span style="color: red"> *Required*</span>
          @endif
        </label>
        <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
      </div>
      <br /><br />

    </div>
    <input type="submit" value="SUBMIT">
  </form>
  <br />

  <p><strong>Recent Messages:</strong></p>

  <ul>
    @foreach($messages as $message)
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $message->title }}</h5>
          <p class="card-text">{{ $message->content }}</p>
          <p><em>{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</em></p>
          <a href="/message/{{ $message->id }}">View</a>
          <a href="#" class="" data-title="{{ $message->title }}" data-id="{{ $message->id }}" data-bs-toggle="modal" data-bs-target="#removeModal">Remove</a>
        </div>
      </div><br />
    @endforeach
  </ul>
</div>

<!-- Remove Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to remove the message titled, <em><span id="titlemsg"></span></em>?</p>
        <input type="hidden" id="hiddenIDfield" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="removeMessageModal" class="btn btn-primary">Remove</button>
      </div>
    </div>
  </div>
</div>
@endsection
