@extends('layouts.admin')
@section('content')
    {{-- update product --}}
    <div class="row d-flex justify-content-center my-5">

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Bootstrap Dark Table -->

            <div class="card">
                <h5 class="card-header">UPDATE PRODUCT</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Product Color</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($products as $product)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $product->product_name }}</strong>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <div class="row g-0">
                                                <div class="col-md-2">
                                                    <img class="card-img card-img-center"
                                                        src="{{ $product->image }}" alt="Card image" />
                                                </div>
                                            </div>
                                        </ul>
                                    </td>
                                    <td>{{ $product->category }}</td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $product->description }}</strong>
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Rs.
                                            {{ $product->price }}</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $product->quantity }}</strong>
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $product->product_color }}</strong>
                                    </td>
                                    {{-- <td><span class="badge bg-label-primary me-1">Active</span></td> --}}
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" class="btn btn-primary" type="button"
                                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth"
                                                    aria-controls="offcanvasBoth" data-product="{{ $product }}" onclick="getProduct(this)"><i class="bx bx-edit-alt me-1"></i>
                                                    Edit</a>
                                                <a class="dropdown-item"  onclick="deleteProduct({{ $product }})"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth"
                                aria-labelledby="offcanvasBothLabel">
                                <div class="offcanvas-header">
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body my-auto mx-0 flex-grow-0">

                                    <form action="" id="updateForm">

                                        <div class="card-body demo-vertical-spacing demo-only-element">
                                            <div class="input-group">
                                                <label class="input-group-text" for="inputGroupFile01">Product name</label>
                                                <input type="text" class="form-control" name="productName" id="productName" />
                                            </div>
                                            <div class="input-group">
                                                <label class="input-group-text" for="inputGroupFile01">Category</label>
                                                <input type="text" class="form-control" name="category" id="category" />
                                            </div>
                                            <div class="input-group">
                                                <label class="input-group-text" for="inputGroupFile01">Description</label>
                                                <input type="text" class="form-control" name="description" id="description" />
                                            </div>
                                            <div class="input-group">
                                                <label class="input-group-text" for="inputGroupFile01">Price</label>
                                                <input type="text" class="form-control" name="price" id="price" />
                                            </div>
                                            <div class="input-group">
                                                <label class="input-group-text" for="inputGroupFile01">Quantity</label>
                                                <input type="text" class="form-control" name="quantity" id="quantity" />
                                            </div>
                                            <div class="input-group">
                                                <label class="input-group-text" for="inputGroupFile01">Product color</label>
                                                <input type="text" class="form-control" name="productColor" id="productColor" />
                                            </div>

                                            <input type="hidden" name="productId" id="productId" />

                                            <div class="card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img class="card-img card-img-left"
                                                            src="../assets/img/elements/12.jpg" alt="Card image" id="productImagePreview" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label class="input-group-text" for="inputGroupFile01">Product
                                                    image</label>
                                                <input onchange="setImage()" type="file" class="form-control"
                                                    id="productImage" aria-describedby="inputGroupFileAddon03"
                                                    aria-label="Upload" />
                                            </div>


                                        </div>
                                    </form>

                                </div>
                                <div class="offcanvas-body my-auto mx-0 flex-grow-0">

                                    <button type="button" class="btn btn-primary mb-2 d-grid w-100"
                                        onclick="updateProduct()">Update</button>
                                    <button type="button" class="btn btn-outline-secondary d-grid w-100"
                                        data-bs-dismiss="offcanvas">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                </div>
            </div>



            </tbody>
            </table>
        </div>
    </div>
    <!--/ Bootstrap Dark Table -->


    </div>
@endsection

<script>
    let base64;

    function updateProduct() {
        const form = document.getElementById("updateForm");

        console.log(form);
        useFetch("/update-product", {
            method: "POST",
            body: {
                id: form.productId.value,
                productName: form.productName.value,
                category: form.category.value,
                description: form.description.value,
                price: form.price.value,
                quantity: form.quantity.value,
                productColor: form.productColor.value,
                productImage: base64
            },
            onSuccess: (data) => {
              iziToast.success({
                title: 'Success',
                message: 'Product updated successfully',
              });
            }
        });
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

    function getProduct(Button) {
        const product = JSON.parse(Button.dataset.product);

        document.getElementById("productId").value = product._id;
        document.getElementById("productName").value = product.product_name;
        document.getElementById("category").value = product.category;
        document.getElementById("description").value = product.description;
        document.getElementById("price").value = product.price;
        document.getElementById("quantity").value = product.quantity;
        document.getElementById("productColor").value = product.product_color;
        document.getElementById("productImagePreview").src = product.image;

    }

    function deleteProduct(product) {
        useFetch("/delete-product", {
            method: "POST",
            body: {
                id: product._id
            },
            onSuccess: (data) => {
              iziToast.success({
                title: 'Success',
                message: 'Product deleted successfully',
              });
            }
        });
    }



</script>
