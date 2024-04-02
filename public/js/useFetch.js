function useFetch(path, options) {
    fetch(`http://localhost:8000/api${path}`, {
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
        },
        method: options.method || "GET",
        body: JSON.stringify(options.body),
    })
    .then(body => body.json())
    .then(response => {
        if (response.status == "success") {
            options.onSuccess(response);
            return;
        }
        throw new Error(response.message);
    })
    .catch(err => {
        const showErrors = options.showErrors || true;
        if (showErrors) {
            iziToast.error({
                position: 'topRight',
                title: 'Error',
                message: err.message,
            });
        }
        return;
    })
}