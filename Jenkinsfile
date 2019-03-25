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
    post {
        failure {
            sh 'AUTHOR_EMAIL=(git show -s --format="%ae" HEAD | sed "s/^ *//;s/ *$//")'
            mail (
                to: "${AUTHOR_EMAIL}",
                subject: "${BUILD_TAG} - Tests Failed",
                body: "Check console output at ${env.BUILD_URL}console to view the results."
            )
        }
    }
}