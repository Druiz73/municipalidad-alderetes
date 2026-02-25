window.addEventListener('load', function () {
    let mainNavigation = document.getElementById('primary-navigation')
    let mainNavigationToggle = document.getElementById('primary-menu-toggle')

    if(mainNavigation && mainNavigationToggle) {
        mainNavigationToggle.addEventListener('click', function (e) {
            e.preventDefault()
            mainNavigation.classList.toggle('hidden')
        })
    }
})

/* ==========================================================================
   UI Components JS
   ========================================================================== */

document.addEventListener('DOMContentLoaded', function () {

    // Accordion — single mode: close siblings when one opens
    document.querySelectorAll('.tp-accordion[data-accordion-type="single"]').forEach(function (accordion) {
        accordion.querySelectorAll('details').forEach(function (detail) {
            detail.addEventListener('toggle', function () {
                if (detail.open) {
                    accordion.querySelectorAll('details[open]').forEach(function (other) {
                        if (other !== detail) {
                            other.removeAttribute('open')
                        }
                    })
                }
            })
        })
    })

    // Alert Dialog — open / close / backdrop
    document.querySelectorAll('.tp-dialog-trigger').forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            var dialog = document.getElementById(trigger.getAttribute('data-dialog-target'))
            if (dialog) {
                dialog.showModal()
            }
        })
    })

    document.querySelectorAll('.tp-alert-dialog').forEach(function (dialog) {
        var cancel  = dialog.querySelector('.tp-dialog-cancel')
        var confirm = dialog.querySelector('.tp-dialog-confirm')

        if (cancel) {
            cancel.addEventListener('click', function () { dialog.close() })
        }
        if (confirm) {
            confirm.addEventListener('click', function () {
                dialog.close('confirm')
                dialog.dispatchEvent(new CustomEvent('confirm'))
            })
        }

        // Close on backdrop click
        dialog.addEventListener('click', function (e) {
            if (e.target === dialog) {
                dialog.close()
            }
        })
    })

    // Dialog — close button (X) + backdrop
    document.querySelectorAll('.tp-dialog').forEach(function (dialog) {
        dialog.querySelectorAll('.tp-dialog-close').forEach(function (btn) {
            btn.addEventListener('click', function () {
                dialog.close()
            })
        })

        dialog.addEventListener('click', function (e) {
            if (e.target === dialog) {
                dialog.close()
            }
        })
    })

    // Drawer — close button + backdrop
    document.querySelectorAll('.tp-drawer').forEach(function (drawer) {
        drawer.querySelectorAll('.tp-dialog-close').forEach(function (btn) {
            btn.addEventListener('click', function () {
                drawer.close()
            })
        })

        drawer.addEventListener('click', function (e) {
            if (e.target === drawer) {
                drawer.close()
            }
        })
    })

    // Carousel — slide tracking, prev/next, dots, autoplay
    document.querySelectorAll('.tp-carousel').forEach(function (carousel) {
        var track      = carousel.querySelector('.tp-carousel-track')
        var slides     = carousel.querySelectorAll('.tp-carousel-slide')
        var prevBtn    = carousel.querySelector('.tp-carousel-prev')
        var nextBtn    = carousel.querySelector('.tp-carousel-next')
        var dots       = carousel.querySelectorAll('.tp-carousel-dot')
        var autoplay   = parseInt(carousel.getAttribute('data-carousel-autoplay') || '0', 10)
        var loop       = carousel.hasAttribute('data-carousel-loop')
        var current    = 0
        var total      = slides.length
        var interval   = null

        function goTo(index) {
            if (loop) {
                index = ((index % total) + total) % total
            } else {
                index = Math.max(0, Math.min(index, total - 1))
            }
            current = index
            track.style.transform = 'translateX(-' + (current * 100) + '%)'
            updateDots()
            updateArrows()
        }

        function updateDots() {
            dots.forEach(function (dot, i) {
                dot.classList.toggle('bg-primary', i === current)
                dot.classList.toggle('bg-zinc-300', i !== current)
            })
        }

        function updateArrows() {
            if (!loop) {
                if (prevBtn) prevBtn.disabled = current === 0
                if (nextBtn) nextBtn.disabled = current === total - 1
            }
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                goTo(current - 1)
                resetAutoplay()
            })
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                goTo(current + 1)
                resetAutoplay()
            })
        }

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                goTo(parseInt(dot.getAttribute('data-slide'), 10))
                resetAutoplay()
            })
        })

        function startAutoplay() {
            if (autoplay > 0) {
                interval = setInterval(function () { goTo(current + 1) }, autoplay)
            }
        }

        function resetAutoplay() {
            if (interval) clearInterval(interval)
            startAutoplay()
        }

        updateArrows()
        startAutoplay()
    })

    // Dropdown Menu — toggle + close on outside click + keyboard
    document.querySelectorAll('.tp-dropdown-menu').forEach(function (dropdown) {
        var trigger = dropdown.querySelector('.tp-dropdown-trigger')
        var content = dropdown.querySelector('.tp-dropdown-content')

        if (!trigger || !content) return

        trigger.addEventListener('click', function (e) {
            e.stopPropagation()
            var isOpen = !content.classList.contains('hidden')
            closeAllDropdowns()
            if (!isOpen) {
                content.classList.remove('hidden')
                content.setAttribute('role', 'menu')
            }
        })

        // Keyboard navigation
        dropdown.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                content.classList.add('hidden')
                trigger.querySelector('button, [role="button"]')?.focus()
            }
        })
    })

    function closeAllDropdowns() {
        document.querySelectorAll('.tp-dropdown-content').forEach(function (el) {
            el.classList.add('hidden')
        })
    }

    document.addEventListener('click', function () {
        closeAllDropdowns()
    })

    // Navigation Menu — hover/click submenu toggle
    document.querySelectorAll('.tp-nav-menu-trigger').forEach(function (trigger) {
        var item    = trigger.closest('.tp-nav-menu-item')
        var content = item ? item.querySelector('.tp-nav-menu-content') : null

        if (!content) return

        trigger.addEventListener('click', function (e) {
            e.stopPropagation()
            var isOpen = !content.classList.contains('hidden')
            closeAllNavMenus()
            if (!isOpen) {
                content.classList.remove('hidden')
                trigger.classList.add('is-open')
            }
        })

        // Open on hover (desktop)
        item.addEventListener('mouseenter', function () {
            if (window.innerWidth >= 768) {
                closeAllNavMenus()
                content.classList.remove('hidden')
                trigger.classList.add('is-open')
            }
        })

        item.addEventListener('mouseleave', function () {
            if (window.innerWidth >= 768) {
                content.classList.add('hidden')
                trigger.classList.remove('is-open')
            }
        })
    })

    function closeAllNavMenus() {
        document.querySelectorAll('.tp-nav-menu-content').forEach(function (el) {
            el.classList.add('hidden')
        })
        document.querySelectorAll('.tp-nav-menu-trigger').forEach(function (el) {
            el.classList.remove('is-open')
        })
    }

    document.addEventListener('click', function () {
        closeAllNavMenus()
    })

    // Tabs — switch between panels
    document.querySelectorAll('.tp-tabs').forEach(function (tabsEl) {
        var triggers = tabsEl.querySelectorAll('.tp-tabs-trigger')
        var panels   = tabsEl.querySelectorAll('.tp-tabs-content')

        triggers.forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                var value = trigger.getAttribute('data-tabs-value')

                // Update triggers
                triggers.forEach(function (t) {
                    var isActive = t.getAttribute('data-tabs-value') === value
                    t.setAttribute('aria-selected', isActive ? 'true' : 'false')
                    t.classList.toggle('bg-white', isActive)
                    t.classList.toggle('text-zinc-950', isActive)
                    t.classList.toggle('shadow', isActive)
                })

                // Update panels
                panels.forEach(function (panel) {
                    var isActive = panel.getAttribute('data-tabs-panel') === value
                    panel.classList.toggle('hidden', !isActive)
                })
            })
        })
    })

    // Toast — close buttons + global API
    document.querySelectorAll('.tp-toast-close').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var toast = btn.closest('.tp-toast')
            if (toast) {
                toast.classList.add('hidden')
            }
        })
    })

    // Global toast function: window.tpToast({ title, description, variant, duration })
    window.tpToast = function (opts) {
        opts = opts || {}
        var container = document.getElementById('tp-toast-container')
        if (!container) return

        var variant = opts.variant || 'default'
        var duration = opts.duration || 5000

        var variantClasses = {
            'default': 'border bg-white text-zinc-950',
            'destructive': 'border-destructive bg-destructive text-white'
        }

        var el = document.createElement('div')
        el.className = 'tp-toast group pointer-events-auto relative flex w-full items-center justify-between gap-4 overflow-hidden rounded-md border p-4 pr-8 shadow-lg transition-all ' + (variantClasses[variant] || variantClasses['default'])
        el.setAttribute('role', 'status')

        var content = '<div class="grid gap-1">'
        if (opts.title) {
            content += '<div class="text-sm font-semibold">' + opts.title + '</div>'
        }
        if (opts.description) {
            content += '<div class="text-sm opacity-90">' + opts.description + '</div>'
        }
        content += '</div>'
        content += '<button type="button" class="tp-toast-close absolute right-1 top-1 rounded-md p-1 opacity-0 transition-opacity hover:opacity-100 group-hover:opacity-100" aria-label="Cerrar">'
        content += '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>'
        content += '</button>'

        el.innerHTML = content
        container.appendChild(el)

        // Animate in
        el.style.animation = 'toast-in 0.3s ease-out'

        // Close button
        el.querySelector('.tp-toast-close').addEventListener('click', function () {
            el.remove()
        })

        // Auto dismiss
        if (duration > 0) {
            setTimeout(function () {
                if (el.parentNode) {
                    el.style.animation = 'toast-out 0.3s ease-in forwards'
                    setTimeout(function () { el.remove() }, 300)
                }
            }, duration)
        }
    }
})
