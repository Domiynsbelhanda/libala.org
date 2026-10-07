(() => {
    const area = document.querySelector('.civil-safe-area');
    const content = document.querySelector('.civil-content');
    const names = document.querySelector('.couple');
    const line = names.querySelector('span');
    function fit() {
        content.style.transform = 'none';
        names.style.removeProperty('font-size');
        const width = line.getBoundingClientRect().width;
        if (width > names.clientWidth) names.style.fontSize = `${parseFloat(getComputedStyle(names).fontSize) * (names.clientWidth - 2) / width}px`;
        const scale = Math.min(1, area.clientHeight / content.offsetHeight);
        content.style.transform = `scale(${scale})`;
    }
    fit();
    document.fonts?.ready.then(fit);
    new ResizeObserver(fit).observe(area);
})();
