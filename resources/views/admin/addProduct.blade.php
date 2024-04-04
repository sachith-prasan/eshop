@extends('layouts.admin')
@section('content')
    {{-- Add Product Form --}}
    <div>
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <h1 class="">Add Product</h1>
        </nav>

        <!-- Custom file input -->
        <div class="row d-flex justify-content-center my-5">
            <div class="col-10">
                <div class="card">
                    <h6 class="card-header"></h6>
                    <form action="" id="productForm">
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Product name</label>
                                <input type="text" class="form-control" name="productName" />
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Category</label>
                                <select type="text" class="form-control" name="category">
                                    <option selected>Choose...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Description</label>
                                <input type="text" class="form-control" name="description" />
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Price</label>
                                <input type="text" class="form-control" name="price" />
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Quantity</label>
                                <input type="text" class="form-control" name="Quantity" />
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Product color</label>
                                <input type="color" class="form-control" name="productColor" />
                            </div>

                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Product image</label>
                                <input onchange="setImage()" type="file" class="form-control" id="productImage"
                                    aria-describedby="inputGroupFileAddon03" aria-label="Upload" />
                            </div>

                            <div class="input-group">
                                <button type="button" class="btn btn-primary" onclick="addProduct()">ADD PRODUCT</button>
                            </div>
                        </div>

                        <div class="mt-3 me-3 ms-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#basicModal">
                                Add Categories
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Add Categories</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBasic" class="form-label">Add Category</label>
                                                    <input type="text" id="categoryName" class="form-control"
                                                        placeholder="Catogery name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-primary" onclick="addCategory()">Add
                                                Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>

    </div>
@endsection

<script>
    let base64;

    function addProduct() {
        const form = document.querySelector('#productForm');


        useFetch("/add-product", {
            method: "POST",
            body: {
                productName: form.productName.value,
                category: form.category.value,
                description: form.description.value,
                price: form.price.value,
                quantity: form.Quantity.value,
                productColor: form.productColor.value,
                productImage: base64,
            },
            onSuccess: (data) => {
                iziToast.success({
                    title: 'Success',
                    message: 'Product added successfully',
                });
            }
        })
    }

    function setImage() {
        const image = document.getElementById('productImage');
        const file = image.files[0];

        if (!file) {
            iziToast.error({
                title: 'Error',
                message: 'Please select an image',
                position: 'topRight'
            })
            return;
        }

        const reader = new FileReader();

        reader.onload = (event) => {
            base64 = event.target.result;
        };
        reader.readAsDataURL(file);
    }

    function addCategory() {
        const categoryName = document.getElementById('categoryName');

        useFetch("/add-category", {
            method: "POST",
            body: {
                name: categoryName.value,
            },
            onSuccess: (data) => {
                iziToast.success({
                    title: 'Success',
                    message: 'Category added successfully',
                })
            }
        })
    }
</script>
