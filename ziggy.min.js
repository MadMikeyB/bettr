    var Ziggy = {
        namedRoutes: {"api.goals.store":{"uri":"api\/goals","methods":["POST"],"domain":null},"api.goals.update":{"uri":"api\/goals\/{goal}","methods":["PATCH"],"domain":null},"api.goals.destroy":{"uri":"api\/goals\/{goal}","methods":["DELETE"],"domain":null},"api.goals.index":{"uri":"api\/goals","methods":["GET","HEAD"],"domain":null},"api.goals.show":{"uri":"api\/goals\/{goal}","methods":["GET","HEAD"],"domain":null},"api.targets.store":{"uri":"api\/targets","methods":["POST"],"domain":null},"api.targets.update":{"uri":"api\/targets\/{target}","methods":["PATCH"],"domain":null},"api.targets.destroy":{"uri":"api\/targets\/{target}","methods":["DELETE"],"domain":null},"api.targets.index":{"uri":"api\/targets","methods":["GET","HEAD"],"domain":null},"api.targets.show":{"uri":"api\/targets\/{target}","methods":["GET","HEAD"],"domain":null},"api.comments.store":{"uri":"api\/comments","methods":["POST"],"domain":null},"api.comments.update":{"uri":"api\/comments\/{comment}","methods":["PATCH"],"domain":null},"api.comments.destroy":{"uri":"api\/comments\/{comment}","methods":["DELETE"],"domain":null},"api.comments.index":{"uri":"api\/comments","methods":["GET","HEAD"],"domain":null},"api.comments.show":{"uri":"api\/comments\/{comment}","methods":["GET","HEAD"],"domain":null},"api.profiles.show":{"uri":"api\/profiles\/{user}","methods":["GET","HEAD"],"domain":null},"api.profiles.goals.show":{"uri":"api\/profiles\/goals\/{user}","methods":["GET","HEAD"],"domain":null},"api.profiles.comments.show":{"uri":"api\/profiles\/comments\/{user}","methods":["GET","HEAD"],"domain":null},"api.profiles.friends.show":{"uri":"api\/profiles\/friends\/{user}","methods":["GET","HEAD"],"domain":null},"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"password\/email","methods":["POST"],"domain":null},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"password\/reset","methods":["POST"],"domain":null},"verification.notice":{"uri":"email\/verify","methods":["GET","HEAD"],"domain":null},"verification.verify":{"uri":"email\/verify\/{id}","methods":["GET","HEAD"],"domain":null},"verification.resend":{"uri":"email\/resend","methods":["GET","HEAD"],"domain":null},"home":{"uri":"\/","methods":["GET","HEAD"],"domain":null},"how-it-works":{"uri":"how-it-works","methods":["GET","HEAD"],"domain":null},"static.terms":{"uri":"terms","methods":["GET","HEAD"],"domain":null},"static.privacy":{"uri":"privacy","methods":["GET","HEAD"],"domain":null},"profiles.show":{"uri":"@{user}","methods":["GET","HEAD"],"domain":null}},
        baseUrl: 'https://bettr.dev/',
        baseProtocol: 'https',
        baseDomain: 'bettr.dev',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
