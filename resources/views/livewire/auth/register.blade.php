<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Register</h1>
                    <form action="" wire:submit.prevent="register">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" wire:model="form.name" class="form-control" name="name" required id="">
                            @error('form.name')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
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
                            <label for="password_confirmation">Password Confirmation</label>
                            <input type="password" wire:model="form.password_confirmation"
                                class="form-control" name="password_confirmation" required id="">
                            @error('form.password_confirmation')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
