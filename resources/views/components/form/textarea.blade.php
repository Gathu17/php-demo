@props(['name'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{$name}}">{{ucwords($name)}}</label>
    <textarea type="text" class="border border-gray-400 w-full p-2" id="{{$name}}" name="{{$name}}" required>
    {{ $slot ?? old($name)}}
    </textarea>
</div>
@error($name)
    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
@enderror