@extends ('layout')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>{{$article->title}}</h2>
	
            <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
            
            {{$article->body}}

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