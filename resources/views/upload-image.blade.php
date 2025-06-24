<form action="{{ route('upload-image') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="thumbnail">

    <input type="submit" value="upload image">
</form>