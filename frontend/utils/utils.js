let Utils = {
    parseJwt: function(token) {
        if(!token)
            return null;
        try {
            const payload = token.split('.')[1];
            const decoded = atob(payload);
            return JSON.parse(decoded);
        }
        catch (e) {
            console.log("Invalid JWT token", e);
            return null;
        }
    },

    showImage: function(base64) {
        return `src="data:image/jpeg;base64,` + base64 + `"`;
    },

    parseImage: function(image) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();

            reader.onload = () => {
                const base64 = reader.result.split(',')[1];
                resolve(base64);
            }

            reader.error = (error) => {
                reject(error);
            };

            reader.readAsDataURL(image);
        })
    },
}