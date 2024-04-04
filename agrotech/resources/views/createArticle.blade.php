@extends('layout.app')

@section('content')

<main class="container pt-4">
    <h1 class="display-2">********</h1>
    <h1 class="display-2">*****</h1>

    <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-dark text-center">Article Creation</h2>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="text-start">
                        <label for="inputCategory">Category</label>
                        <select name="category" id="inputCategory" class="form-control" required>
                                <option value="">cat</option>
                        </select>
                    </div>
<br>
                    <div class="text-start">
                        <label for="title">Title</label>
                        <input name="title" class="form-control is-invalid" id="title" placeholder="Title event" required>

                        <span class="invalid-feedback" role="alert">
                                <strong>nn</strong></span>
                    </div>
<br>
                    <div class="text-start">
                        <label for="desc">Description</label>
                        <textarea name="description" class="form-control is-invalid" id="desc" placeholder="Description event" required></textarea>

                        <span class="invalid-feedback" role="alert">
                                <strong>nn</strong>
                            </span>
                    </div>
<br>
                    <div class="text-start">
                        <label for="picture">Cover</label>
                        <input type="file" accept="image/*" name="picture" class="form-control is-invalid" id="picture" required/>

                        <span class="invalid-feedback" role="alert">
                                <strong>nn</strong>
                            </span>
                    </div>
<br>
                    <button type="submit" class="btn btn-secondary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
