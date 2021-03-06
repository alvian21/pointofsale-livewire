<div class="row">
    <div class="col-md-7">
        <div class="card" >
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h2 class="font-weight-bold">Product List</h2>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="" wire:model="search" class="form-control" id="">
                    </div>
                </div>

                <div class="row">
                    @foreach ($products as $item)
                    <div class="col-md-3 mb-3  d-flex align-items-stretch">
                        <div class="card" >
                            <div class="card-body" >
                                <img width="100%" src="{{asset('storage/images/'.$item->image)}}" alt="" srcset="" style="object-fit: cover; width:100%;height:125px">
                                <button wire:click="addItem({{$item->id}})" class="btn btn-primary btn-sm" style="position: absolute;top:0;right:0"><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <div class="card-footer">
                                <h6 class="text-center font-weight-bold">{{$item->name}}</h6>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{$products->links()}}
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h2 class="font-weight-bold">Cart</h2>
                @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carts as $cart)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$cart['name']}}</td>
                            <td>    <button type="button" style="padding: 7px 10px" wire:click="increaseItem('{{$cart['rowId']}}')"
                                class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button> {{$cart['qty']}}
                                <button type="button" style="padding: 7px 10px"  wire:click="decreaseItem('{{$cart['rowId']}}')"
                                class="btn btn-sm btn-secondary"><i class="fas fa-minus"></i></button>
                            </td>
                            <td>Rp {{number_format($cart['price'] ,2,',','.')}} </td>
                            <td>
                                <button type="button" style="padding: 7px 10px" wire:click="removeItem('{{$cart['rowId']}}')"
                                    class="btn btn-sm btn-dark"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <td colspan="5">
                            <h6 class="text-center">Empty Cart</h6>
                        </td>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="font-weight-bold">Cart Summary</h4>
                <h4 class="font-weight-bold">Sub Total : {{ number_format($summary['sub_total'] ,2,',','.')}}</h4>
                <h5 class="font-weight-bold">Tax : {{number_format($summary['pajak']  ,2,',','.')}}</h5>
                <h5 class="font-weight-bold">Total : {{number_format($summary['total']  ,2,',','.')}}</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <button wire:click="enableTask" class="btn btn-primary btn-sm btn-block">Add Tax</button>
                    </div>
                    <div class="col-sm-6">
                        <button wire:click="disableTask" class="btn btn-danger btn-sm btn-block">Remove Tax</button>
                    </div>
                </div>
                <div class="mt-4">
                    <button class="btn btn-success active btn-block">Save Transaction</button>
                </div>
            </div>
        </div>
    </div>
</div>
