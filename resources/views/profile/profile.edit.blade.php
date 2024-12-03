<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')
    @include('profile.partials.update-profile-information-form')
    <button type="submit">Update Profile</button>
</form>


@include('profile.partials.update-password-form')

@include('profile.partials.delete-user-form')
