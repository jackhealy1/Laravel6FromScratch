@extends ('layout')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
	<a href="/articles/create" accesskey="4" title="">
	<button class="button is-link">
	New Article
	</button>
	<br>
	</a>

	<br>

	@forelse ($article as $article)
	<div id="content">
		<div class="title">
			<h2>
				<a href="{{ $article->path() }}">
				{{$article->title}}
				</a>
			</h2>
			{!! $article->excerpt !!}	
		</div>
	
		<p>
			<img src="images/banner.jpg" alt="" class="image image-full"/>
		</p>	
	</div>
	@empty
		<p>No relevant articles yet.</p>
	@endforelse
	</div>
</div>

@endsection