document.querySelectorAll('.circle').forEach((circle, index) => {
    const backgroundClasses = [
        'hover-artist-1',
        'hover-artist-2',
        'hover-artist-3',
        'hover-artist-4',
        'hover-artist-5'
    ];
    const beforeColors = [
        'rgba(252, 179, 21)', 
        'rgba(200, 62, 62)',   
        'rgba(62, 96, 154)',   
        'rgba(63, 169, 95)',   
        'rgba(32, 32, 32)'     
    ];
    

    circle.addEventListener('mouseenter', () => {
        document.body.classList.add(backgroundClasses[index]);
        document.body.style.backgroundImage = 'none';

        
        const ruleLocation = findCssRuleIndex('.rectangle-wrapper::before');
        if (ruleLocation) {
            let st1 = document.styleSheets[ruleLocation.stylesheetIndex].cssRules[ruleLocation.ruleIndex];
            st1.style.backgroundColor = beforeColors[index];
            st1.style.backgroundImage = 'none';
        }
    });

    circle.addEventListener('mouseleave', () => {
        document.body.classList.remove(backgroundClasses[index]);
        document.body.style.backgroundImage = "url('../assets/images/background.jpg')";


        const ruleLocation = findCssRuleIndex('.rectangle-wrapper::before');
        if (ruleLocation) {
            let st1 = document.styleSheets[ruleLocation.stylesheetIndex].cssRules[ruleLocation.ruleIndex];
            st1.style.backgroundColor = 'transparent'; // Reset pseudo-element color
            st1.style.backgroundImage = "url('../assets/images/background.jpg')"; // Reset background image
        }
    });
});

document.querySelectorAll("nav ul li a").forEach(link => {
    link.addEventListener("click", function() {
        document.querySelectorAll("nav ul li a").forEach(a => a.classList.remove("active"));
        this.classList.add("active");
    });
});

function findCssRuleIndex(selector) {
    for (let i = 0; i < document.styleSheets.length; i++) {
        let stylesheet = document.styleSheets[i];
        try {
            for (let j = 0; j < stylesheet.cssRules.length; j++) {
                let rule = stylesheet.cssRules[j];
                if (rule.selectorText === selector) {
                    console.log(`Found ${selector} at index ${j} in stylesheet ${i}`);
                    return { stylesheetIndex: i, ruleIndex: j };
                }
            }
        } catch (e) {
            console.error("Access to stylesheet %d denied", i);
        }
    }
    console.log(`No CSS rule with selector '${selector}' found.`);
    return null;
}
