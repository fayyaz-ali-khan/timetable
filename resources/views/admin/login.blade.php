<!-- resources/views/admin/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}"  />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
</head>
<body>
    <div class="card">
        <h5 class="card-header">Admin Login</h5>
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-center h-px-500">
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <h3 class="mb-4">Sign In</h3>
      
              <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="abc@gmail.com" />
                @error('email')
                <span>{{ $message }}</span>
                @enderror
              </div>
      
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="form-alignment-password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password"  name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="form-alignment-password2" />
                  @error('password')
                  <span class="input-group-text cursor-pointer" id=""><i class="bx bx-hide">{{ $message }}</i></span>
                  @enderror
                </div>
              </div>
              {{-- <div class="mb-3">
                <label class="form-check m-0">
                  <input type="checkbox" class="form-check-input" />
                  <span class="form-check-label">Remember me</span>
                </label>
              </div> --}}
              <div class="">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    {{-- <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Login</button>
    </form> --}}
</body>
</html>
