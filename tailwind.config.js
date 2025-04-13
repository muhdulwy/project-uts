/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {},
    },
    plugins: [
        //kode untuk aktifkan plugin form
        require("@tailwindcss/forms"),
    ],
};
