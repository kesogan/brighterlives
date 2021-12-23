$('.deleteBtn').on('click', function(e){
    e.preventDefault();
    const url = $(this).attr('data-url') 

    console.log(url)

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1EA9A4',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        preConfirm: (confirm) => {
            return fetch(url)
            .then(response => {
                if (!response.ok) {
                throw new Error(response.statusText)
                }
                return response.json()
            })
            .catch(error => {
                Swal.showValidationMessage(
                `Request failed: ${error}`
                )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
        if (result.value) {
            Swal.fire({
            title: "Item Deleted",
            text: "Item successfully deleted!",
            type: 'success',
            }).then(function() {
                location.reload();
            });
        }
    })
})