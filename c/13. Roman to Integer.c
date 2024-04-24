int value(char x){
    switch(x){
        case 'I': return 1;
        case 'V': return 5;
        case 'X': return 10;
        case 'L': return 50;
        case 'C': return 100;
        case 'D': return 500;
        case 'M': return 1000;            
    }
    return -1;
}

int romanToInt(char * s){
    int n = strlen(s);
    if(n>16) return 0;
    int ans=0;
    int i=0;
    while(i<n){
        printf("%d\n",i);
        if(value(s[i])<value(s[i+1])){
            ans=ans+ ( value(s[i+1])-value(s[i]) );
            i=i+2;
        }
        else{
            ans = ans+value(s[i]);
            i++;
        }
    }
    printf("%d\n", ans);
    return ans;
}
