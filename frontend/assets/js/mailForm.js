const MailForm = {
    sendEmail: function(form) {
        const data = Object.fromEntries(new FormData(form));

        const buisnisEmail = `luka.prlenfa@stu.ibu.edu.ba`;

        const mailLink = `mailto:` + buisnisEmail
            + `?subject=` + data.subject
            + `&body=` + data.fulname + `\n` + data.email + `\n\n\n` + data.message;

        window.location.href = mailLink;
    },
}