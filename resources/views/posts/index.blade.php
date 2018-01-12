@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
<h2 style="font-family: 'Caveat', cursive;padding:40px 0px 20px;">
  <span class="yellow">S</span><span style="font-size:40px;">HINSOTSU</span>&nbsp;<span class="" style="color:#FF3366;font-size:2em;">B</span><span style="font-size:40px;">IBITTA</span>
  <hr class="alt2" />
</h2>
<div id="newversion">
        <a href="http://www.seattleconsulting.co.jp/team16/profile/kamata">
        <h2 style="font-family: 'Caveat', cursive;">&nbsp;FROM<br>&nbsp;KAMATA</h2>
        <span>&nbsp;&nbsp;Click here to find<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;out more!</span>
        </a>
</div>
<!-- Slideshow -->
<ul class="slideshow">
<li><img src="/css/img/mei_kamata.png" width="550" height="350" /></li>
<li><img src="/css/img/imacros.jpg" width="550" height="350" /></li>
<li><img src="/css/img/git.png" width="550" height="350" /></li>
<li><h3>かまたてきSB1</h3><p>1年間RさんでフロントENGで仕事して感じたこと<br>
言語：PHP（90％）Javascript,jQuery,html,css<br>フレームワーク：Symfony2</p></li>
</ul>
<!-- 記事一覧 -->

<!-- Table -->
<table cellspacing="0" cellpadding="0" class="sortable" style="background-color: white;">
<thead>
    <tr>
        <th>article</th>
        <th>
        action<a href="{{ url('/posts/create') }}" class="pull-right"><i class="fa fa-plus-square"></i></a>
        </th>
    </tr>
</thead>
<tbody>
    @forelse ($posts as $post)
    <tr>
        <td>
        <a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a>
        </td>
        <td>
            <a href="{{ action('PostsController@edit', $post->id) }}" class="fs12"><i class="fa fa-pencil"></i>Edit</a>&nbsp;
            <form action="{{ action('PostsController@destroy', $post->id) }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this);" class="fs12"><i class="fa fa-trash"></i>Delete</a>
            </form>
        </td>
      @empty
        <td>
            No posts yet
        </td>
        <td>
            No action
        </td>
    </tr>
      @endforelse
</tbody>
</table>



<script>
function deletePost(e) {
  'use strict';

  if (confirm('are you sure?')) {
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>
@endsection