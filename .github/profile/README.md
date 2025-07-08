# cutie
### cutie.com

Welcome to Cutie

This project houses the software sub system for my blog website: cutie.com

## Projects
1. web: [website](https://github.com/blankorg/cutie-web-site)  
main: [web](https://github.com/blankorg/cutie-web)

## Steps:  
1. Setup:
    1. Create docker:  
        1. /web  
            This will create :  
                1. web-site  
                2. nginx-proxy

2. Operate:
    1. Update article in CMS  
    2. RUN [NCMS](https://github.com/blank-org/ncms)

3. Deploy:  
    1. Run `render.sh` - [tiggu](https://github.com/blank-org/tiggu)  
    2. push `project\build\public` for CI/CD

