@extends('layouts.default')

@section('title', 'Blog Detail')

@section('content')
<h4>
  <a href="{{ url('/') }}" class="button orange pull-right" style="margin-top: 1px; margin-bottom: 15px;">Back</a>
  {{ $post->title }}
<hr class="alt2" />
</h4>
<div class="f-article">
<p class="article">{!! nl2br(e($post->body)) !!}</p>
</div>
<h5>Comments</h5>
<!-- Table -->
<table cellspacing="0" cellpadding="0" class="sortable" style="background-color: white;" >
<thead>
    <tr>
        <th>Comments</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @forelse ($post->comments as $comment)
    <tr>
        <td>
        {{ $comment->body }}
        </td>
        <td>
            <form action="{{ action('CommentsController@destroy', [$post->id, $comment->id]) }}" id="form_{{ $comment->id }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('delete') }}
              <a href="#" data-id="{{ $comment->id }}" onclick="deleteComment(this);"><i class="fa fa-trash"></i>Delete</a>
            </form>
        </td>
      @empty
        <td>
            No comment yet
        </td>
        <td>
            No action
        </td>
    </tr>
      @endforelse
</tbody>
</table>

<h5>Add New Comment</h5>
<form method="post" action="{{ action('CommentsController@store', $post->id) }}">
  {{ csrf_field() }}
  <p>
    <input type="text" name="body" placeholder="body" value="{{ old('body') }}">
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="Add Comment">
  </p>
</form>

<script>
function deleteComment(e) {
  'use strict';

  if (confirm('are you sure?')) {
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>

@endsection