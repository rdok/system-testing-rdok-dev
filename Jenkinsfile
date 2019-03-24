pipeline {
    agent {
        docker {
            image 'codeception/codeception:2.5.2'
            args '''
                --volume="$PWD:/app"
                --workdir=/app
                --entrypoint=''
            '''
        }
    }
    stages {
        stage('code-quests.rdok.dev') {
            steps {
                sh 'codecept run codequests_rdok_dev --no-colors'
            }
        }
        stage('rdok.dev') {
            steps {
                sh 'codecept run rdok_dev --no-colors'
            }
        }
        stage('jenkins.rdok.dev') {
            steps {
                sh 'codecept run jenkins_rdok_dev --no-colors'
            }
        }
    }
}