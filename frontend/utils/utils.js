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
    }
}