<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Product List</h5>
                    <table class="table table-hovered table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col" width="40%">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td><img width="50%" src="{{asset('storage/images/'.$item->image)}}" alt="" srcset="">
                                </td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    <div x-data="deleteData()">
                                        <button class="btn btn-dark btn-sm p-2 delete"
                                            x-on:click="open('{{$item->id}}')" data-id="{{$item->id}}"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Product</h5>
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input wire:model="name" type="text" class="form-control" id="product_name">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <div class="custom-file">
                                <input type="file" wire:model="image" placeholder="Choose Image"
                                    class="custom-file-input" id="customFile">
                                <label for="customFile" class="custom-file-label"></label>
                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @if ($image)
                            <label class="mt-2">Image Preview:</label>
                            <img src="{{$image->temporaryUrl()}}" alt="Preview Image" class="img-fluid" srcset="">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea wire:model="description" class="form-control" id="description"></textarea>
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input wire:model="qty" type="number" class="form-control" id="qty">
                            @error('qty')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input wire:model="price" type="number" class="form-control" id="price">
                            @error('price')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function deleteData()
    {
       return {
           open(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.$wire.destroy(id).then(res=>{
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    })

                }
                })
           }
       }
    }
</script>
@endsection
