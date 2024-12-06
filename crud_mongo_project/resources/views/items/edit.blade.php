<h1>Edit Item</h1>
<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ $item->name }}" required>
    <br>
    <label for="description">Description</label>
    <textarea id="description" name="description">{{ $item->description }}</textarea>
    <br>
    <button type="submit">Update</button>
</form>
