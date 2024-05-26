document.getElementById('generatePDF').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const profile = document.getElementById('profile').value;
    const fullName = document.getElementById('fullName').value;
    const cin = document.getElementById('cin').value;
    const phone = document.getElementById('phone').value;
    const address = document.getElementById('address').value;
    const email = document.getElementById('email').value;
    const education = document.getElementById('education').value;
    const skills = document.getElementById('skills').value;
    const experience = document.getElementById('experience').value;
    const languages = document.getElementById('languages').value;
    const interests = document.getElementById('interests').value;

    doc.text(20, 20, 'Mon CV');
    doc.text(20, 30, 'Nom complet: ' + fullName);
    doc.text(20, 40, 'CIN: ' + cin);
    doc.text(20, 50, 'Téléphone: ' + phone);
    doc.text(20, 60, 'Adresse: ' + address);
    doc.text(20, 70, 'Email: ' + email);

    doc.text(20, 80, 'Profil:');
    doc.text(20, 90, profile);

    doc.text(20, 100, 'Éducation:');
    doc.text(20, 110, education);

    doc.text(20, 120, 'Compétences:');
    doc.text(20, 130, skills);

    doc.text(20, 140, 'Expérience professionnelle:');
    doc.text(20, 150, experience);

    doc.text(20, 160, 'Langues:');
    doc.text(20, 170, languages);

    doc.text(20, 180, 'Centres d\'intérêt:');
    doc.text(20, 190, interests);

    doc.save('mon_cv.pdf');
});
