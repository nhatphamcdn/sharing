const FitHeightScreen = () => {
    if (!document.querySelector('header') ||
        !document.querySelector('.section-content')) {
        return;
    }

    const height_header = document.querySelector('header').clientHeight;
    const content_container = document.querySelector('.section-content');
    content_container.style.height = `calc(100vh - ${height_header}px`;
    content_container.style.marginTop = `${height_header}px`;

    // Specific for wrap editor
    if (document.querySelector('.section-content')) {
        const wrapEditor = document.querySelector('#scrolling-container');
        const spaceTop = wrapEditor.getBoundingClientRect().top;
        wrapEditor.style.height = `calc(100vh - ${spaceTop}px`;
    }
}

export default FitHeightScreen;