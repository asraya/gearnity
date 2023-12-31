@extends('layouts.frontend.app')
@section('content')
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="me-lg-4">
					<div class="row gy-5">
						@foreach ($data['blog'] as $blog)
						<div class="col-md-6" data-aos="fade">
							<article class="blog-post">
								<div class="post-slider slider-sm rounded">
									<img loading="lazy" decoding="async" src="{{ $blog['image_path'] }}" alt="Post Thumbnail">
									<img loading="lazy" decoding="async" src="images/blog/post-5.jpg" alt="Post Thumbnail">
									<img loading="lazy" decoding="async" src="images/blog/post-3.jpg" alt="Post Thumbnail">
								</div>
								<div class="pt-4">
									<p class="mb-3">{{ $blog['created_at']->format('jS F Y') }}</p>
									<h2 class="h4"><a class="text-black" href="{{ route('frontend.blog.detail',['slug' => $blog['slug']]) }}">{{ $blog['title'] }}.</a></h2>
									<p>{{ $blog['content'] }} …</p> <a href="{{ route('frontend.blog.detail',['slug' => $blog['slug']]) }}" class="text-primary fw-bold" aria-label="Read the full article by clicking here">Read More</a>
								</div>
							</article>
						</div>	
						@endforeach
					
						<div class="col-12">
							<nav class="mt-4">
								<!-- pagination -->
								<nav class="mb-md-50">
									<ul class="pagination justify-content-center">
										
									</ul>
								</nav>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<!-- categories -->
				<div class="widget widget-categories">
					<h5 class="widget-title"><span>Category</span></h5>
					<ul class="list-unstyled widget-list">
						@foreach ($global_category as $category)					
						<li><a href="{{ route('frontend.category.show',$category->slug) }}">{{ $category->name }} <small class="ml-auto">({{ $category->count() }})</small></a>
						</li>
						@endforeach
				
					</ul>
				</div>
				<!-- tags -->
				<div class="widget widget-tags">
					<h4 class="widget-title"><span>Tags</span></h4>
					<ul class="list-inline widget-list widget-list-inline taxonomies-list">
						<li class="list-inline-item"><a href="#!">Booth</a>
						</li>
						<li class="list-inline-item"><a href="#!">City</a>
						</li>
						<li class="list-inline-item"><a href="#!">Image</a>
						</li>
						<li class="list-inline-item"><a href="#!">New</a>
						</li>
						<li class="list-inline-item"><a href="#!">Photo</a>
						</li>
						<li class="list-inline-item"><a href="#!">Seasone</a>
						</li>
						<li class="list-inline-item"><a href="#!">Video</a>
						</li>
					</ul>
				</div>
				<!-- latest post -->
				<div class="widget">
					<h5 class="widget-title"><span>Latest Article</span></h5>
					<!-- post-item -->
					<ul class="list-unstyled widget-list">
						<li class="d-flex widget-post align-items-center">
							<a class="text-black" href="/blog/elements/">
								<div class="widget-post-image flex-shrink-0 me-3">
									<img class="rounded" loading="lazy" decoding="async" src="images/blog/post-4.jpg" alt="Post Thumbnail">
								</div>
							</a>
							<div class="flex-grow-1">
								<h5 class="h6 mb-0"><a class="text-black" href="blog-details.html">Elements That You Can Use To Create A New Post On This Template.</a></h5>
								<small>March 15, 2020</small>
							</div>
						</li>
					</ul>
					<ul class="list-unstyled widget-list">
						<li class="d-flex widget-post align-items-center">
							<a class="text-black" href="/blog/post-1/">
								<div class="widget-post-image flex-shrink-0 me-3">
									<img class="rounded" loading="lazy" decoding="async" src="images/blog/post-1.jpg" alt="Post Thumbnail">
								</div>
							</a>
							<div class="flex-grow-1">
								<h5 class="h6 mb-0"><a class="text-black" href="blog-details.html">Cheerful Loving Couple Bakers Drinking Coffee</a></h5>
								<small>March 14, 2020</small>
							</div>
						</li>
					</ul>
					<ul class="list-unstyled widget-list">
						<li class="d-flex widget-post align-items-center">
							<a class="text-black" href="/blog/post-2/">
								<div class="widget-post-image flex-shrink-0 me-3">
									<img class="rounded" loading="lazy" decoding="async" src="images/blog/post-2.jpg" alt="Post Thumbnail">
								</div>
							</a>
							<div class="flex-grow-1">
								<h5 class="h6 mb-0"><a class="text-black" href="blog-details.html">Cheerful Loving Couple Bakers Drinking Coffee</a></h5>
								<small>March 14, 2020</small>
							</div>
						</li>
					</ul>
				</div>
				<!-- Social -->
				<div class="widget">
					<h4 class="widget-title"><span>Social Links</span></h4>
					<ul class="list-unstyled list-inline mb-0 social-icons">
						<li class="list-inline-item me-3"><a title="Explorer Facebook Profile" class="text-black" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
						</li>
						<li class="list-inline-item me-3"><a title="Explorer Twitter Profile" class="text-black" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
						</li>
						<li class="list-inline-item me-3"><a title="Explorer Instagram Profile" class="text-black" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection