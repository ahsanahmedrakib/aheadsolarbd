@if ($errors->any())
    <div class="rounded-lg border border-(--admin-danger)/40 bg-(--admin-danger)/10 px-4 py-3 mb-4">
        <p class="text-[13px] font-semibold text-(--admin-danger) mb-1.5">Please fix the following errors:</p>
        <ul class="list-disc pl-5 space-y-0.5">
            @foreach ($errors->all() as $error)
                <li class="text-[12.5px] text-(--admin-danger)/90">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif