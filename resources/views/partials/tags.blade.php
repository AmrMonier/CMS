<h6 class="sidebar-title">Tags</h6>
<div class="gap-multiline-items-1">
    @foreach ($tags as $tag)
      <a class="badge badge-secondary" href="{{ route('tag.show', $tag->id) }}">
        {{ $tag->name}}
      </a>
    @endforeach
    <a href="{{ route('tag.index') }}">
      See more...
    </a>
</div>
