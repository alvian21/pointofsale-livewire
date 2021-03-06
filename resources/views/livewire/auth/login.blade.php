<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Login</h1>
                    <form action="" wire:submit.prevent="submit">
                        @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                        </div>
                        @endif
                        @if (session()->has('info'))
                        <div class="alert alert-info" role="alert">
                            {{session('info')}}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" wire:model="form.email" class="form-control" name="email" required
                                id="">
                            @error('form.email')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" wire:model="form.password" class="form-control" name="password"
                                required id="">
                            @error('form.password')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
