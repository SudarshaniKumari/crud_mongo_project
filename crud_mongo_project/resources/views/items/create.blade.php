<h1>Add New Item</h1>
<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="description">Description</label>
    <textarea id="description" name="description"></textarea>
    <br>
    <button type="submit">Submit</button>
</form>
