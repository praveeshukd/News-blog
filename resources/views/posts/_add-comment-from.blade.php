@auth

<form method="POST" action='/posts/{{$post->slug}}/comments' class="border border-gray=200 p-6 rounded-xl">
  @csrf
  
  <header class="flex item-center">
  <img src="https://i.pravatar.cc/60?id={{auth()->id()}}" alt="" width="60" height="60" class="rounded-full">
      <h2> want to participate</h2>
</header>
<div class="mt-6">
<textarea name="body" class="w-full" cols="10" rows="5" placeholder="quick, think of something to say " required></textarea>
@error('body')
<span class="text-xs text-red-500">{{ $message }}</span>
@enderror


</div>
<div class="flex justify-end mt-6 pt-6 border-t border-gray-200">

<x-submit-button>Post </x-submit-button>

</div>
</form>
@else
<p>
<a href="/register">Register  !</a>  <a href="/login">Login in to leave a comment </a>
</p>
@endauth