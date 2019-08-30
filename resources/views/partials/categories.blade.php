<h6 class="sidebar-title">Categories</h6>
<div class="row link-color-default fs-14 lh-24">
  @foreach ($categories as $category )
    <div class="col-8">
      <a href="{{ route('category.show', $category->id) }}">
        {{$category->name}}
      </a>
    </div>
  @endforeach
  <div class="col-8">
    <a href="{{ route('category.index') }}">
      See more...
    </a>
  </div>
</div>
