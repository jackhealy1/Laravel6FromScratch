@extends ('layout')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>{{$article->title}}</h2>
	
            <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
            
            {{$article->body}}

			<p style="margin-top: 1em">
				@foreach ($article->tags as $tag)
				<a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
				@endforeach
			</p>

			<br>

			<a href="/articles/{{$article->id}}/edit" accesskey="4" title="">
			<button class="button is-link">
			Edit Article
			</button>
			</a>
			
		</div>
	
	</div>
</div>

@endsection