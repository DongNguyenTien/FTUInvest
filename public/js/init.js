$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function off() {
    document.getElementById("overlay").style.display = "none";
}

function on() {
    document.getElementById("overlay").style.display = "block";
}

