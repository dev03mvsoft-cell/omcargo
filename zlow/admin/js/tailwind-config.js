/**
 * Oman Cargo Mover - Tailwind CSS Configuration
 * This file is shared across all admin and root pages.
 */
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                "primary": "#4b91c7",
                "background-light": "#f8f6f6",
                "background-dark": "#1a1512",
            },
            fontFamily: { 
                "display": ["Public Sans", "sans-serif"] 
            },
            borderRadius: { 
                "DEFAULT": "0.25rem", 
                "lg": "0.5rem", 
                "xl": "1rem", 
                "2xl": "1.5rem" 
            },
        },
    },
}
