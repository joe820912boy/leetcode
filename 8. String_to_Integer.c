int myAtoi(char * s){
    int i;
    int n=strlen(s);
    bool ispositive = true;
    for(i=0;i<n;i++){
        if(!isdigit(s[i]) && s[i]!=' ' && s[i]!='+' && s[i]!='-')
            return 0;
        else if(s[i]==' '){
            continue;
        }
        else if(s[i]=='+'){
            i++;
            break;
        }
        else if(s[i]=='-'){
            ispositive=false;
            i++;
            break;
        }
        else{
            break;
        }
    }
    long long ans=0;
    for(int j=i;j<n;j++){
        if(!isdigit(s[j]))
            break;
        ans = ans*10 + (ispositive ? (s[j]-'0') : -(s[j]-'0') );
        //Suppose the char numbers are '0-9' and suppose they are ACSII:
        //'0' - '0' = 48 - 48 = 0
        //'1' - '0' = 49 - 48 = 1
        //'2' - '0' = 50 - 48 = 2

        if(ans>INT_MAX)
            return INT_MAX;
        else if (ans<INT_MIN)
            return INT_MIN;
    }
    printf("%d", ans);
    return (int) ans;
}
