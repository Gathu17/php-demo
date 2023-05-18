@props(['name' , 'type' => 'text'])

<div class="mb-6">
    <label for="{{$name}}" class="block text-grey-darker text-sm font-bold mb-2">{{ucwords($name)}}</label>
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" {{ $attributes([ 'value' => old($name)]) }}  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey bg-grey-lighter leading-tight" > 
</div>
@error($name)
        <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror