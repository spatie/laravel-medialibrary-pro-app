@if(count($errors))
    <div class="rounded-sm mb-8 px-4 py-2 bg-red-100 text-red-500">
        Please correct the errors in the form
    </div>
@endif

@if ($message !== '')
    <div class="rounded-sm mb-8 px-4 py-2 bg-green-100 text-green-500">
        Your form has been submitted
    </div>
@endif
<br/>
