<style>
    .avatar-wrapper {
        position: relative;
        width: 150px;
        height: 150px;
        margin: auto;
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        transition: 0.3s ease-in-out;
    }

    .avatar-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        border-radius: 50%;
        opacity: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s ease-in-out;
        cursor: pointer;
    }

    .avatar-wrapper:hover .avatar-overlay {
        opacity: 1;
    }

    .avatar-overlay i {
        color: #fff;
        font-size: 24px;
    }
</style>

<div class="row">
    <div class="d-flex justify-content-center">
        <form id="avatarForm" action="{{ route('profiles.update.image') }}" method="POST" enctype="multipart/form-data"
            style="display:none;">
            @csrf
            <input type="file" name="image" id="avatarInput" accept="image/*" />
        </form>

        <div class="avatar-wrapper" onclick="document.getElementById('avatarInput').click();">
            <img src="{{ asset('storage/avatars/' . auth()->user()->image) }}" alt="Avatar" class="avatar-img">
            <div class="avatar-overlay">
                <i class="fas fa-camera"></i>
            </div>
        </div>
    </div>

    <label for="profileName" class="form-label fw-bold text-center mt-3">{{ auth()->user()->name }}</label>
</div>


<script>
    document.getElementById('avatarInput').addEventListener('change', function() {
        document.getElementById('avatarForm').submit();
    });
</script>
