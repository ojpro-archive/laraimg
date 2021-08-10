@extends('layouts.main')
@section('header')
    
@extends('layouts.components.header')
@endsection
@section('content')


<div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Post</div>
<form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
    
    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 rounded-md outline-none" spellcheck="false" placeholder="Title" type="text" name="title">
    <div>
        <div class="relative flex border justify-center border-gray-300 rounded-md mb-4">
      <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
      <select class="bg-gray-100 w-full  h-10  pl-5 pr-10 block rounded-md hover:border-gray-400 focus:outline-none appearance-none" name="category">
        <option>Choose The Category</option>
        <option value="Laravel">Laravel</option>
        <option value="PHP">PHP</option>
        <option value="Vue">Vue</option>
        <option value="Wordpress">Wordpress</option>
        <option value="Nodejs">Nodejs</option>
        <option value="React">React</option>
        <option value="Python">React</option>
      </select>
    </div>
    </div>
  
    
    <textarea name="description" class="description bg-gray-100 sec p-3 h-60 rounded-md border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here" id="description"></textarea>
    <!-- component -->
<div class="flex w-full h-auto mt-4 items-center justify-center bg-grey-lighter">
  
  <label class="flex flex-row justify-center items-center w-full px-8 py-2 bg-white text-blue rounded-lg shadow-sm tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-400 hover:text-white">
    <span class="text-base leading-normal mr-8">Select a file</span>
    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
      </svg>
      
      <input type='file' name="thumbnail" class="hidden" />
  </label>
</div>
    <!-- buttons -->
    <div class="buttons flex m-4">
      <button type="reset" class="btn border border-gray-300 p-1 px-4 rounded-md font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</button>
      <button type="submit" class="btn border border-blue-400 p-1 px-4 rounded-md font-semibold cursor-pointer text-white ml-2 bg-blue-400">Post</butt>
    </div>
  </form>
  </div>
  <script>
    ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
  </script>
  @if (count($errors) > 0)
@foreach ($errors->all() as $error)
{{ $error }}
@endforeach
@endif
  @endsection