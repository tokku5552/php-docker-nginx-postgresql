# CloudFormation Templates

- deploy with AWSCLI
```bash:
cd CFn

# NetworkStack
aws cloudformation deploy --template-file network.yml --stack-name LaravelNetwork

# ApplicationStack
aws cloudformation deploy --template-file application.yml --stack-name LaravelApplication
```

- delete Stack with AWSCLI
```bash:
cd CFn

# NetworkStack
aws cloudformation delete-stack --stack-name LaravelNetwork

# ApplicationStack
aws cloudformation delete-stack --stack-name LaravelApplication
```