<x-layout> 
    
    <x-setting heading="Publish new Post">
        <form method="POST" action="/admin/posts/" enctype="multipart/form-data">
        @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />
            <x-form.field>
                <label class="block mb-4 uppercase font-bold text-xs text-gray-700" for="category_id">Categories</label>
                <select name="category_id" id="category_id">
                
                   @foreach (\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
                </select>
            </x-form.field>
                      
            <x-form.button>
                Submit
            </x-form.button>
        </form>
        
    </x-setting>
</x-layout>