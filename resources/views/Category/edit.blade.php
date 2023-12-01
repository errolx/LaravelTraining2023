<x-app-layout>

    @if (session('status'))
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-md-0">
            <h2 class="h4">Edit Category</h2>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12 col-xl-8">

            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Category</h2>

                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input class="form-control @error('category_name') is-invalid @enderror"
                                    id="category_name" name="category_name" type="text" placeholder="Name"
                                    value="{{ old('category_name', $category->category_name) }}">
                                @error('category_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input class="form-control @error('description') is-invalid @enderror" id="description"
                                    name="description" type="text" placeholder="Description"
                                    value="{{ old('description', $category->description) }}">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update</button>
                        <a href="{{ url()->previous() }}" class="btn btn-gray-800 mt-2 animate-up-2">Cancel</a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
