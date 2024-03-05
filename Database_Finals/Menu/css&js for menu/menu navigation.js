function scrollToSection(section) {
    const sectionElement = document.getElementById(section);
    if (sectionElement) {
            
    sectionElement.scrollIntoView({ behavior: 'smooth' });
    } else {
    console.error(`Section '${section}' not found.`);
}
}
